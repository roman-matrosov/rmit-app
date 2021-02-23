<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Unique;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('appCode', TextType::class, [
            	'required' => true,
            	'constraints' => [
            		new NotBlank(),
					new Length([
						'min' => 1,
						'max' => 255
					])
				]
			])
            ->add('name', TextType::class, [
				'required' => true,
            	'constraints' => [
            		new NotBlank(),
            		new Length([
            			'max' => 255
					])
				]
			])
            ->add('appGroup', TextType::class, [
            	'constraints' => [
            		new Length([
            			'max' => 90
					])
				]
			])
            ->add('appType', TextType::class, [
				'constraints' => [
					new Length([
						'max' => 90
					])
				]
			])
            ->add('description', TextareaType::class)
            ->add('appCost', NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
