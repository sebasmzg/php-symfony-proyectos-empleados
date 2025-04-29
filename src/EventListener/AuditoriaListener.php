<?php

namespace App\EventListener;

use App\Entity\Auditoria;
use App\Entity\Empleado;
use App\Entity\Proyecto;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class AuditoriaListener
{
    private Security $security;
    private EntityManagerInterface $em;

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    #[AsEventListener(event: 'doctrine.orm.postPersist')]
    public function onPostPersist(LifecycleEventArgs $args): void
    {
        $this->logChange($args, 'CREATE');
    }

    #[AsEventListener(event: 'doctrine.orm.postUpdate')]
    public function onPostUpdate(LifecycleEventArgs $args): void
    {
        $this->logChange($args, 'UPDATE');
    }

    #[AsEventListener(event: 'doctrine.orm.postRemove')]
    public function onPostRemove(LifecycleEventArgs $args): void
    {
        $this->logChange($args, 'DELETE');
    }

    private function logChange(LifecycleEventArgs $args, string $action): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Empleado && !$entity instanceof Proyecto) {
            return; // Solo auditar Empleado y Proyecto
        }

        $user = $this->security->getUser();
        if (!$user) {
            return; // No usuario logueado
        }

        $auditoria = new Auditoria();
        $auditoria->setUsuario($user->getUserIdentifier()); // obtener username/email
        $auditoria->setEntidad($entity instanceof Empleado ? 'Empleado' : 'Proyecto');
        $auditoria->setAccion($action);
        $auditoria->setFechaHora(new \DateTimeImmutable());

        $this->em->persist($auditoria);
        $this->em->flush();
    }
}
