<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;

trait AddressableTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 100,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private string $address;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=100, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 100,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private string $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 100,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private string $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=10, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 10,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private string $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 50,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private string $country;

    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Email(message = "constraint.email")
     **/
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="phone_number", type="integer", length=20, nullable=true)
     * @Assert\Type(type="string", message="constraint.type")
     * @Assert\Length(
     *      min = 2, max = 20,
     *      minMessage = "constraint.length.min",
     *      maxMessage = "constraint.length.max",
     * )
     */
    private Integer $phoneNumber;

    /********************************************* Custom functions *********************************************/

    /**
     * Get full address formated from HTML
     * @return string
     */
    public function getFullAddress()
    {
        $address = '';
        if ($this->getAddress())
            $address .= $this->getAddress() . '<br>';
        if ($this->getStreet())
            $address .= $this->getStreet() . '<br>';
        if ($this->getPostalCode())
            $address .= $this->getPostalCode() . ', ';
        if ($this->getCountry())
            $address .= Intl::getRegionBundle()->getCountryName($this->getCountry()) . '<br>';

        return '<address>' . $address . '</address>';
    }

    /********************************************* Trait functions *********************************************/

    /**
     * Set address
     *
     * @param string $address
     * @return AddressableTrait
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return AddressableTrait
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return AddressableTrait
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
}
