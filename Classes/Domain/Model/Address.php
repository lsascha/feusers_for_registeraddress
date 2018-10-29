<?php

namespace Lsascha\Feusersforregisteraddress\Domain\Model;


/**
 *
 *
 * @package registeraddress
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Address extends \AFM\Registeraddress\Domain\Model\Address
{

    /**
     * moduleSysDmailNewsletter
     *
     * @var boolean
     */
    protected $moduleSysDmailNewsletter;

    /**
     * @return bool
     */
    public function isModuleSysDmailNewsletter()
    {
        return $this->moduleSysDmailNewsletter;
    }

    /**
     * @return bool
     */
    public function getModuleSysDmailNewsletter()
    {
        return $this->moduleSysDmailNewsletter;
    }

    /**
     * @param bool $moduleSysDmailNewsletter
     */
    public function setModuleSysDmailNewsletter($moduleSysDmailNewsletter)
    {
        $this->moduleSysDmailNewsletter = $moduleSysDmailNewsletter;
    }
}