# Laravel API Response

A Laravel package for consistent and configurable API responses with built-in exception handling, pagination, and automatic resource detection.  
Controllers become ultra-clean — just return models, arrays, or resources, and the package wraps them in a standard JSON response.

---

## Features

- Standardized `success` and `error` responses
- Configurable response keys (`status`, `message`, `data`, `errors`, `meta`)
- Automatic Eloquent `Resource` & `ResourceCollection` detection
- Pagination helper for `LengthAwarePaginator`
- Global exception handling (`ApiException`, `ApiValidationException`)
- Middleware auto-wraps controller responses
- Easy integration, fully PSR-4 autoloaded

---

## Installation

```bash
composer require maimalee/laravel-api-response
