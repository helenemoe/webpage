<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditUserAdminType extends AbstractType {
	
	private $departmentId;


    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }
	
	
    public function buildForm(FormBuilderInterface $builder, array $options) {
		 
		$builder
            ->add('firstName', 'text', array(
				'label' => 'Fornavn',
			))
			->add('lastName', 'text', array(
				'label' => 'Etternavn',
			))
			->add('email', 'text', array(
				'label' => 'E-post',
			))
			->add('phone', 'text', array(
				'label' => 'Telefon',
			))
			->add('fieldOfStudy', 'entity', array(
				'label' => 'Linje',
				'class' => 'AppBundle:FieldOfStudy',
				'query_builder' => function(EntityRepository $er )  {
					return $er->createQueryBuilder('f')
						->orderBy('f.short_name', 'ASC')
						->where('f.department = ?1')
						// Set the parameter to the department ID that the current user belongs to.
						->setParameter(1, $this->departmentId);
				}
			))
			->add('save', 'submit', array(
				'label' => 'Lagre',
			));
    }
	
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
	
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
		
    }
	
    public function getName() {
        return 'editUserAdmin';
    }
	
}