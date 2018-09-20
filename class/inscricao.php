<?php

class inscricao {

	private $Id_inscricao;
	private $NumCadastro;
	private $CPF;
	private $CNPJ;
	private $Nome;
	private $Endereco;
	private $EnderecoEntrega;
	private $ExercicioAnoBase;
	private $LantTipLancto;
	private $LancNumLancto;
	private $Principal;
	private $Correcao;
	private $Multa;
	private $Juros;
	private $Honorarios;
	private $DivTotal;	



		public function getId_inscricao()
		{
		    return $this->Id_inscricao;
		}
		
		private function setId_inscricao($Id_inscricao)
		{
		    return $this->Id_inscricao = $Id_inscricao;
		}

		public function getNumCadastro()
		{
		    return $this->NumCadastro;
		}
		
		private function setNumCadastro($NumCadastro)
		{
		    return $this->NumCadastro = $NumCadastro;
		}

		public function getCPF()
		{
		    return $this->CPF;
		}
		
		private function setCPF($CPF)
		{
		    return $this->CPF = $CPF;
		}
		public function getCNPJ()
		{
		    return $this->CNPJ;
		}
		
		private function setCNPJ($CNPJ)
		{
		    return $this->CNPJ = $CNPJ;
		}


		public function getNome()
		{
		    return $this->Nome;
		}


		private function setNome($Nome)
		{
		    return $this->Nome = $Nome;
		}

		public function getEndereco()
		{
		    return $this->Endereco;
		}
		
		private function setEndereco($Endereco)
		{
		    return $this->Endereco = $Endereco;
		}
		public function getEnderecoEntrega()
		{
		    return $this->EnderecoEntrega;
		}
		
		private function setEnderecoEntrega($EnderecoEntrega)
		{
		    return $this->EnderecoEntrega = $EnderecoEntrega;
		}
		public function getExercicioAnoBase()
		{
		    return $this->ExercicioAnoBase;
		}
		
		private function setExercicioAnoBase($ExercicioAnoBase)
		{
		    return $this->ExercicioAnoBase = $ExercicioAnoBase;
		}
		public function getLantTipLancto()
		{
		    return $this->LantTipLancto;
		}

		
		private function setLantTipLancto($LantTipLancto)
		{
		    return $this->LantTipLancto = $LantTipLancto;
		}

		public function getLancNumLancto()
		{
		    return $this->LancNumLancto;
		}
		
		public function setLancNumLancto($LancNumLancto)
		{
		    return $this->LancNumLancto = $LancNumLancto;
		}

		public function getPrincipal()
		{
		    return $this->Principal;
		}
		
		private function setPrincipal($Principal)
		{
		    return $this->Principal = $Principal;
		}
		public function getCorrecao()
		{
		    return $this->Correcao;
		}

		
		private function setCorrecao($Correcao)
		{
		    return $this->Correcao = $Correcao;
		}
		public function getMulta()
		{
		    return $this->Multa;
		}
		
		private function setMulta($Multa)
		{
		    return $this->Multa = $Multa;
		}
		public function getJuros()
		{
		    return $this->Juros;
		}
		
		private function setJuros($Juros)
		{
		    return $this->Juros = $Juros;
		}

		public function getHonorarios()
		{
		    return $this->Honorarios;
		}

		public function setHonorarios($Honorarios)
		{
		    return $this->Honorarios = $Honorarios;
		}
		public function getDivTotal()
		{
		    return $this->DivTotal;
		}
		
		private function setDivTotal($DivTotal)
		{
		    return $this->DivTotal = $DivTotal;
		}



	public function setData($data){
            
            try {
            $this->setId_inscricao($data['Id_inscricao']);
			$this->setNumCadastro($data['NumCadastro']);
			$this->setCPF($data['CPF']);
			$this->setCNPJ($data['CNPJ']);
			$this->setNome($data['Nome']);
			$this->setEndereco($data['Endereco']);
			$this->setEnderecoEntrega($data['EnderecoEntrega']);
			$this->setExercicioAnoBase($data['ExercicioAnoBase']);
			$this->setLantTipLancto($data['LantTipLancto']);
			$this->setLancNumLancto($data['LancNumLancto']);
			$this->setPrincipal($data['Principal']);
			$this->setCorrecao($data['Correcao']);
			$this->setMulta($data['Multa']);
			$this->setJuros($data['Juros']);
			$this->setHonorarios($data['Honorarios']);
			$this->setDivTotal($data['DivTotal']);

                
            } catch (Exception $exc) {
                echo "error";//$exc->getTraceAsString();
            }

           
	}

	/**
	 * Faz load dos resultados apos realizada uma busca na 
	 * base de dados especificada pela classe sql
	 */
	/*busca por cpf*/
	public function loadByNIS($nis){

		$sql = new sql();
		//Clausula de busca select, usada para vasculhar o banco
		$results = $sql->select("SELECT * FROM tb_iptu WHERE NIS = :NIS", array(

			":NIS"=>$nis

		));

		if(count($results)>0){
			$this->setData($results[0]);
		}

	}

   
}
