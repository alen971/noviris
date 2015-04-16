<?php
namespace NO\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InternauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('max_length' => 200, 'required' => true, 'label' => 'Nom'))
            ->add('prenom','text',array('max_length' => 200, 'required' => true, 'label' => 'Prénom'))
            ->add('email','email',array('max_length' => 200, 'required' => true, 'label' => 'Email'))
			->add('datedenaissance', 'date', array('widget' => 'choice',
										'label'  => 'Date de naissance',
                                            'input' => 'string', 
                                            'format' => 'y/M/d', 
                                            'empty_value' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
                                            'required' => true
                                            )
					)
			->add('marque', 'choice', array('label'=>'Marque',
											'choices' => array(""=>"",1 => "Peugeot", 2 => "Renault", 3 => "Fiat"), 
                                            'required' => true
											)
				)
 			->add('modele', 'choice', array('label'=>'Modele',
											'choices' => array(""=>"",1 => "206", 2 => "508", 3 => "Clio", 4 => "Megane", 5 => "Punto"), 
                                            'required' => true)
				)
			->add('save', 'submit');					
    }

  public function getName()
  {
    return 'internaute';
  }
}