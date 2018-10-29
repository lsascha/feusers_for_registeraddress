<?php

namespace Lsascha\Feusersforregisteraddress\Controller;

use AFM\Registeraddress\Controller\AddressController as RegisteraddressAddressController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use AFM\Registeraddress\Domain\Model\Address;

/**
 *
 *
 * @package feusersforregisteraddress
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AddressController extends RegisteraddressAddressController
{

    /**
     * action delete
     *
     * @param \string $hash
     * @param boolean $doDelete
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidExtensionNameException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     * @throws \TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotException
     * @throws \TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotReturnException
     * @validate $hash NotEmpty
     */
    public function deleteAction($hash = NULL, $doDelete = false)
    {
        $address = $this->addressRepository->findOneByRegisteraddresshashIgnoreHidden($hash);
        $this->view->assign('hash', $hash);

        if ($address && $doDelete) {

            if ($this->settings['sendDeleteApproveMails']) {
                $data = [
                    'address' => $address
                ];
                $this->sendResponseMail(
                    $address->getEmail(),
                    'Address/MailNewsletterDeleteSuccess',
                    $data,
                    $this->settings['mailformat'],
                    LocalizationUtility::translate(
                        'mail.deletesuccess.subjectsuffix',
                        'registeraddress'
                    )
                );
            }

            if ($this->settings['adminmail']) {
                $adminRecipient = $this->settings['adminmail'];
                $subject = $this->settings['deleteSubject'];

                $this->sendResponseMail(
                    $adminRecipient,
                    'Address/Admin/MailAdminDelete',
                    ['address' => $address],
                    self::MAILFORMAT_TXT,
                    $subject
                );
            }
            $signalSlotDispatcher = GeneralUtility::makeInstance(Dispatcher::class);
            $signalSlotDispatcher->dispatch(__CLASS__, 'deleteBeforePersist', [$address]);

            //$this->addressRepository->remove($address);
            $address->setModuleSysDmailNewsletter(false);
            $this->addressRepository->update($address);

        }
        $this->view->assign('address', $address);
        $this->view->assign('doDelete', $doDelete);
    }
}