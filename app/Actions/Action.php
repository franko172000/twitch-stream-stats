<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

abstract class Action
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @return array
     */
    abstract public function rules(): array;

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return mixed
     */
    abstract public function execute();

    /**
     * @param array $errors
     */
    protected function onActionValidationException(array $errors): void
    {
    }

    /**
     * @return mixed
     * @throws ValidationException
     */
    public function handle(): mixed
    {
        $this->handleAuthorization();
        $this->handleValidation();

        return $this->execute();
    }

    /**
     * @return void
     */
    protected function handleAuthorization(): void
    {
        if ($this->authorize()) {
            return;
        }

        throw new UnauthorizedHttpException('Basic', 'Unauthorized to execute ' . static::class);
    }

    /**
     * @return void
     * @throws ValidationException
     */
    protected function handleValidation(): void
    {
        $validator = Validator::make($this->data, $this->rules());

        if (!$validator->fails()) {
            return;
        }

        $errors = $validator->errors()->toArray();
        $this->onActionValidationException($errors);

        throw ValidationException::withMessages($errors, static::class);
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function __set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function __get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function __isset(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public static function run(array $data = []): mixed
    {
        return app(static::class)
            ->setData($data)
            ->handle();
    }
}
