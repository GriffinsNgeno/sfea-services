<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\AccessRoles;
use App\Form\Type\CheckPhoneUZType;
use App\Model\CheckPhoneUZ;
use App\Model\PhoneReq;
use App\Model\Request as AppRequest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/checkphone_uz', name: self::NAME)]
#[IsGranted(AccessRoles::ROLE_CHECK_PHONE_UZ)]
class CheckPhoneUZController extends AbstractFormController
{
    public const NAME = 'checkphone_uz';

    protected function getFormClass(): string
    {
        return CheckPhoneUZType::class;
    }

    protected function getName(): string
    {
        return self::NAME;
    }

    protected function getTemplateTitle(): string
    {
        return 'Проверка телефона 🇺🇿';
    }

    protected function appRequestFactory(mixed $check): AppRequest
    {
        \assert($check instanceof CheckPhoneUZ);

        return (new AppRequest())
            ->addPhone(
                (new PhoneReq())
                    ->setPhone($check->getMobilePhone())
            );
    }
}
