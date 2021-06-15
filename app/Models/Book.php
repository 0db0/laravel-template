<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Book
 *
 * @OA\Schema (
 *     @OA\Xml(name="Book"),
 *     @OA\Property(
 *         property="title",
 *         description="Book title",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         description="Book price",
 *         type="number",
 *         format="float"
 *     )
 * )
 * @property int $id
 * @property string $title
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $year
 * @property-read Collection|Author[] $authors
 * @property-read int|null $authors_count
 * @method static BookFactory factory(...$parameters)
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book wherePrice($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @method static Builder|Book whereYear($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}
