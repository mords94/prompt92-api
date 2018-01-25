<?php

namespace App\Helpers\Traits;


trait ResourcePaginationTrait
{
    /**
     * Displays links for pagination
     *
     * @return array
     */
    private function paginationLinks()
    {
        return [
            'self' => $this->url($this->currentPage()),
            'prev' => $this->previousPageUrl(),
            'next' => $this->nextPageUrl(),
        ];
    }

    /**
     * Displays meta information for pagination
     *
     * @return array
     */
    private function paginationMeta()
    {
        return [
            'current_page' => $this->currentPage(),
            'total' => $this->total(),
            'first_item' => $this->firstItem(),
            'last_item' => $this->lastItem(),
            'last_page' => $this->lastPage(),
            'per_page' => $this->perPage(),
            'has_more_pages' => $this->hasMorePages(),
        ];
    }
}