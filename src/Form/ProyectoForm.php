<?php

namespace App\Form;

use App\Entity\Empleado;
use App\Entity\Proyecto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProyectoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreProyecto')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('empleados', EntityType::class, [
                'class' => Empleado::class,
                'choice_label' => 'nombre',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proyecto::class,
        ]);
    }
}
