<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\AppService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Unique;

class AppServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serviceCode', TextType::class, [
            	'required' => true,
				'constraints' => [
					new NotBlank(),
					new Length([
						'min' => 1,
						'max' => 255
					]),
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
            ->add('type', TextType::class, [
            	'constraints' => [
            		new Length([
            			'max' => 4
					])
				]
			])
            ->add('subType', TextType::class, [
				'constraints' => [
					new Length([
						'max' => 4
					])
				]
			])
            ->add('description', TextareaType::class)
            ->add('application', EntityType::class, [
            	'class' => Application::class,
//				'choice_label' => 'name',
//				'multiple' => false,
//				'expanded' => true
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AppService::class,
        ]);
    }
}
