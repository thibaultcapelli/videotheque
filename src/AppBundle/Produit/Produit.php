<?php

namespace AppBundle\Produit;


class Produit

    {
        private $id;
        private $libelle;
        private $qte;
        private $prixht;

        public function __construct($id, $libelle, $qte, $prixht) {
            $this->id = $id;
            $this->libelle = $libelle;
            $this->qte = $qte;
            $this->prixht = $prixht;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getLibelle()
        {
            return $this->libelle;
        }

        public function getQte()
        {
            return $this->qte;
        }

        public function setQte($qte)
        {
            $this->qte = $qte;
            return $this;
        }

        public function getPrixht()
        {
            return $this->prixht;
        }

        public function setPrixht($prixht)
        {
            $this->prixht = $prixht;
            return $this;
        }

        public function getPrixttc()
        {
            return $this->prixht * 1.2;
        }


}
