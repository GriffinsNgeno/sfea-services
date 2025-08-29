<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\AccessRoles;
use App\Form\Type\CheckPhoneBGType;
use App\Model\CheckPhoneBG;
use App\Model\PhoneReq;
use App\Model\Request as AppRequest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/checkphone_bg', name: self::NAME)]
#[IsGranted(AccessRoles::ROLE_CHECK_PHONE_BG)]
class CheckPhoneBGController extends AbstractFormController
{
    public const NAME = 'checkphone_bg';

    protected function getFormClass(): string
    {
        return CheckPhoneBGType::class;
    }

    protected function getName(): string
    {
        return self::NAME;
    }

    protected function getTemplateTitle(): string
    {
        return 'Проверка телефона 🇧🇬';
    }

    protected function appRequestFactory(mixed $check): AppRequest
    {
        \assert($check instanceof CheckPhoneBG);

        return (new AppRequest())
            ->addPhone(
                (new PhoneReq())
                    ->setPhone($check->getMobilePhone())
            );
    }
}
