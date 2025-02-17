<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BooksAndAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'Стив Макконнелл',
            'Михаил Фленов',
            'Мэтт Стаффер',
            'Дэвид Скляр',
            'Адам Трахтенберг',
            'Бэрон Шварц',
            'Вадим Ткаченко',
            'Петр Зайцев',
            'Ральф Джонсон',
            'Джон Влиссидес',
            'Ричард Хелм',
            'Эрих Гамма'
        ];

        foreach ($authors as $authorName) {
            Author::create(['name' => $authorName]);
        }

        $books = [
            ['title' => 'Совершенный код', 'authors' => ['Стив Макконнелл']],
            ['title' => 'PHP глазами хакера', 'authors' => ['Михаил Фленов']],
            ['title' => 'Laravel. Полное руководство', 'authors' => ['Мэтт Стаффер']],
            ['title' => 'PHP. Рецепты программирования', 'authors' => ['Дэвид Скляр', 'Адам Трахтенберг']],
            ['title' => 'MySQL по максимуму', 'authors' => ['Бэрон Шварц', 'Вадим Ткаченко', 'Петр Зайцев']],
            ['title' => 'Паттерны объектно-ориентированного проектирования', 'authors' => ['Ральф Джонсон', 'Джон Влиссидес', 'Ричард Хелм', 'Эрих Гамма']],
        ];

        foreach ($books as $bookData) {
            $book = Book::create(['title' => $bookData['title']]);
            foreach ($bookData['authors'] as $authorName) {
                $author = Author::where('name', $authorName)->first();
                if ($author) {
                    $book->authors()->attach($author);
                }
            }
        }
    }
}
