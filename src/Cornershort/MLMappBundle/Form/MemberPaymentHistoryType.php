<?php

namespace Cornershort\MLMappBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberPaymentHistoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('leaderId')->add('memberId')->add('membershipOption')->add('activationLevel')->add('productAmount')->add('levelAmount')->add('dateRequested')->add('dateLevelUpgraded')->add('isLevelPaid')->add('dateProductUpgraded')->add('isProductPaid')->add('dateCompleted')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cornershort\MLMappBundle\Entity\MemberPaymentHistory'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cornershort_mlmappbundle_memberpaymenthistory';
    }


}
