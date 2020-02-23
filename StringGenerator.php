<?php


namespace chryssalid;

/**
 * String generator.
 *
 * @author Łukasz Feller
 * @package chryssalid
 */
class StringGenerator {

    protected $charset;
    protected $customCharset = '';
    private $charsets = [
        'empty'      => '',
        'default'    => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
        'lowercased' => 'abcdefghijklmnopqrstuvwxyz',
        'uppercased' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'digits'     => '0123456789',
        'special'    => '!@#$%&*-_+='
    ];

    /**
     * @param string $charset
     */
    public function __construct(string $charset = 'default') {
        if (!array_key_exists($charset, $this->charsets)) {
            $charset = 'default';
        }
        $this->charset = $charset;
    }

    /**
     * @param string $charset
     *
     * @return $this
     */
    public function addCharset(string $charset): self {
        $this->customCharset = $charset;

        return $this;
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function generate(int $length): string {
        $result = '';
        $charsets = $this->charsets[$this->charset] . $this->customCharset;
        $count = strlen($charsets);

        for ($i = 0; $i < $length; $i++) {
            $char = $charsets[rand(0, $count - 1)];
            $result .= $char;
        }

        return $result;
    }
}