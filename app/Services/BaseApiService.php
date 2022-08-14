<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class BaseApiService
{
    /**
     * @return string
     */
    abstract protected function baseUrl(): string;

    /**
     * @return PendingRequest
     */
    protected function httpClient(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl());
    }

    /**
     * @param string $url
     * @param array  $endpointParameters
     *
     * @return string
     */
    protected function url(string $url, array $endpointParameters = []): string
    {
        if (!empty($endpointParameters)) {
            $url = __($url, $endpointParameters);
        }

        return $url;
    }
}
