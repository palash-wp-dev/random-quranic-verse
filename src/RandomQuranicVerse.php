<?php

namespace RandomQuranicVerse;

class RandomQuranicVerse
{
    // this is the api to fetch the random 'Ayah'
    private $apiUrl = "https://api.quran.com/api/v4/verses/random?translations=131"; 
    public static $verse = null;
    public static $reference = null;

    /**
     * Fetch a random Quranic verse and store it in static properties.
     */
    public function __construct()
    {
        $curl = curl_init();

        curl_setopt_array( $curl, [
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Accept: application/json'],
            CURLOPT_SSL_VERIFYPEER => false
        ] );

        $response = curl_exec( $curl );
        if ( curl_errno( $curl ) ) {
            echo "Error fetching data: " . curl_error( $curl );
            return;
        }
        curl_close( $curl );

        $data = json_decode( $response, true );

        // Validate API response structure
        if ( !empty( $data['verse'] ) && !empty( $data['verse']['translations'][0]['text'] ) ) {
            self::$verse = $data['verse']['translations'][0]['text']; // Store verse translation
            self::$reference = $data['verse']['verse_key']; // Store verse reference
        } else {
            echo "Failed to fetch data. API response structure may have changed.";
        }
    }
}
