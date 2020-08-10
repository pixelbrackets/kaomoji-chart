<?php
namespace Pixelbrackets\KaomojiChart;

class KaomojiChart
{
    /**
     * The (never) complete list of kaomoji
     *
     * @var array
     */
    protected static $kaomojis = [
        [
            'character' => '\(^_^)/',
            'category' => '1',
            'name' => 'banzai',
        ],
        [
            'character' => '٩(◕‿◕｡)۶',
            'category' => '1',
            'name' => 'happy',
        ],
        [
            'character' => '┌(＾＾)┘',
            'category' => '1',
            'name' => 'dancing',
        ],
        [
            'character' => '♡( ◡‿◡ )',
            'category' => '1',
            'name' => 'love',
        ],
        [
            'character' => '¯\_(ツ)_/¯',
            'category' => '2',
            'name' => 'shrug',
        ],
        [
            'character' => 'o(>< )o',
            'category' => '3',
            'name' => 'angry',
        ],
        [
            'character' => '(;_;)',
            'category' => '3',
            'name' => 'cry',
        ],
    ];

    /**
     * Categories for the kaomoji chart
     *
     * @var array
     */
    protected static $categories = [
        1 => [
            'category' => '1',
            'name' => 'Positive Emotions',
        ],
        2 => [
            'category' => '2',
            'name' => 'Neutral Emotions',
        ],
        3 => [
            'category' => '3',
            'name' => 'Negative Emotions',
        ]
    ];

    /**
     * Returns the list of kaomoji
     *
     * @return array
     */
    public static function getKaomojis(): array
    {
        return self::$kaomojis;
    }

    /**
     * Returns the list of kaomoji grouped by category
     *
     * @return array
     */
    public static function getKaomojisGroupedByCategory(): array
    {
        return self::groupArray(self::$kaomojis, 'category');
    }

    /**
     * Return a single kaomoji
     *
     * @param string $name Name of the kaomoji
     * @return array Is empty if no matching kaomoji is found
     */
    public static function getKaomoji($name = ''): array
    {
        $key = array_search($name, array_column(self::$kaomojis, 'name'), true);
        return ($key === false)? [] : self::$kaomojis[$key];
    }

    /**
     * Returns the list of kaomoji categories
     *
     * @return array
     */
    public static function getCategories(): array
    {
        return self::$categories;
    }

    /**
     * Group an array of associative arrays by some key
     *
     * @param array $associativeArray Array that stores multiple associative arrays
     * @param string $groupByKey Property to sort by
     * @return array
     */
    protected static function groupArray(array $associativeArray, string $groupByKey): array
    {
        $result = array();

        foreach ($associativeArray as $array) {
            if (array_key_exists($groupByKey, $array)) {
                $result[$array[$groupByKey]][] = $array;
            } else {
                $result[''][] = $array;
            }
        }

        return $result;
    }
}
