<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add('code', TextType::class, array(
            'label' => 'codigo'
        ))
        ->add('name', TextType::class, array(
            'label' => 'nombre'
        ))
        ->add('description', TextType::class, array(
            'label' => 'descripcion'
        ))
        ->add('brand', TextType::class, array(
            'label' => 'marca'
        ))
        ->add('price', NumberType::class, array(
            'label' => 'precio'
        ))
        ->add('category', CategoryType::class, array(
            'label' => 'categoria'
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'registrar'
        ))
        ;
    }
}
