<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *     @OA\Xml(name="BookCollection"),
 *     @OA\Property(
 *         property="books",
 *         description="book list",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Book")
 *     )
 * )
 */
class BookCollection extends ResourceCollection
{
    public static $wrap = 'books';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => 200,
            'books' => $this->collection,
            'timestamp' => Carbon::now(),
        ];
    }
}
