# random-quranic-verse
A PHP package to fetch a random Quranic verse with its translation.

## Installation

Install via Composer:

```bash
composer require your-namespace/random-quranic-verse

## Usage

use RandomQuranicVerse\RandomQuranicVerse;

// Create an instance
$randomVerse = new RandomQuranicVerse();

// Access the verse and reference
echo "Verse: " . RandomQuranicVerse::$verse . PHP_EOL;
echo "Reference: " . RandomQuranicVerse::$reference . PHP_EOL;



