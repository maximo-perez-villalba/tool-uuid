<?php
namespace MPV\Tools;

/**
 * @author Máximo Perez Villalba
 */
abstract class UUID 
{

    /** @var string */
    const pattern_type = '^[a-z0-9]{8}$';
	
    /**
     * @param string $uuid
     * @return bool
     */
    public static function validate(string $uuid): bool 
    { 
        return preg_match('/'.UUID::pattern_type.'/', $uuid); 
    }
	
    /**
     * @return string
     */
    public static function generate(): string 
    {
        $value = random_bytes(24).uniqid();
        $entropy = memory_get_usage() * pi();
        
        return hash('crc32b',"{$value}{$entropy}");
    }
}
