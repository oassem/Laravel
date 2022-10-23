<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class PostsShowView implements Responsable
{
    public array $props;

    public function __construct(array $data = [])
    {
        $this->props = array_merge($this->getDefaultProps(), $data);
    }

    public function toResponse($request)
    {
        return view('posts/ajax', $this->props);
    }

    private function getDefaultProps()
    {
        return [];
    }
}
