<?php
namespace itbz\httpio;


class HeaderToolMock extends HeaderTool
{

    /**
     * List of headers set
     * @var array $headers
     */
    private $headers = array();


    /**
     * Set http status
     * @param int $status
     * @param string $desc
     * @return void
     */
    public function status($status, $desc)
    {
        return $this->header("Status", "$status $desc", TRUE);
    }


    /**
     * Send a raw HTTP header
     * @param string $name
     * @param string $value
     * @param bool $replace
     * @return void
     */
    public function header($name, $value, $replace = TRUE)
    {
        if ( $replace || !isset($this->headers[$name])) {
            $this->headers[$name] = $value;
        } else {
            $this->headers[$name] .= ", $value";
        }
    }


    /**
     * Remove previously set headers
     * @param string $name
     * @return void
     */
    public function header_remove($name)
    {
        unset($this->headers[$name]);
    }


    /**
     * Returns a numerically indexed array of headers
     * @return array
     */
    public function headers_list()
    {
        $return = array();
        foreach ( $this->headers as $name => $header ) {
            $return[] = "$name: $header";
        }
        return $return;
    }

}
