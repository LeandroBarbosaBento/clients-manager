<?php
namespace Controller;

use Model\DB;

class Main
{

    public function getData()
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "SELECT * FROM clients";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $clients = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)){

            extract($row);
    
            $client = [
                "id"            => $id,
                "name"          => html_entity_decode($name),
                "document"      => html_entity_decode($document),
                "zipcode"       => html_entity_decode($zipcode),
                "address"       => html_entity_decode($address),
                "district"      => html_entity_decode($district),
                "city"          => html_entity_decode($city),
                "state"         => html_entity_decode($state),
                "phone"         => html_entity_decode($phone),
                "email"         => html_entity_decode($email),
                "active"        => $active,
            ];

            array_push($clients, $client);
        }

        return $clients;
        
    }

    public function getTotalActiveClients()
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "SELECT count(active) AS active FROM clients WHERE active = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $total = $stmt->fetch(\PDO::FETCH_ASSOC); 

        return $total;
    }

    public function getTotalInactiveClients()
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "SELECT count(active) AS inactive FROM clients WHERE active = 0";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $total = $stmt->fetch(\PDO::FETCH_ASSOC); 

        return $total;

    }

    public function getDataFromClient($id)
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "SELECT * FROM clients WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", htmlspecialchars(strip_tags($id)));
        $stmt->execute();

        $client = $stmt->fetch(\PDO::FETCH_ASSOC); 

        return $client;
    }

    public function editClient($id, $data)
    {
        $db = new DB();
        $conn = $db->connect();

        $query = "UPDATE
                clients
            SET
                name=:name,
                document=:document,
                zipcode=:zipcode,
                address=:address,
                district=:district,
                city=:city,
                state=:state,
                phone=:phone,
                email=:email,
                active=:active
            WHERE
                id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", htmlspecialchars(strip_tags($data['name'])));
        $stmt->bindParam(":document", htmlspecialchars(strip_tags($data['document'])));
        $stmt->bindParam(":zipcode", htmlspecialchars(strip_tags($data['zipcode'])));
        $stmt->bindParam(":address", htmlspecialchars(strip_tags($data['address'])));
        $stmt->bindParam(":district", htmlspecialchars(strip_tags($data['district'])));
        $stmt->bindParam(":city", htmlspecialchars(strip_tags($data['city'])));
        $stmt->bindParam(":state", htmlspecialchars(strip_tags($data['state'])));
        $stmt->bindParam(":phone", htmlspecialchars(strip_tags($data['phone'])));
        $stmt->bindParam(":email", htmlspecialchars(strip_tags($data['email'])));
        $stmt->bindParam(":active", htmlspecialchars(strip_tags($data['active'])));
        $stmt->execute();

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function loadDataFromXML($clients)
    {
        $db = new DB();
        $conn = $db->connect();
        
        $query = "INSERT INTO clients
                    SET
                        name=:name,
                        document=:document,
                        zipcode=:zipcode,
                        address=:address,
                        district=:district,
                        city=:city,
                        state=:state,
                        phone=:phone,
                        email=:email,
                        active=:active";
      
        $stmt = $conn->prepare($query);

        foreach($clients as $client)
        {
            $active = $client['ativo'] == 1 ? 1 : 0;

            $stmt->bindParam(":name", htmlspecialchars(strip_tags($client['nome'])));
            $stmt->bindParam(":document", htmlspecialchars(strip_tags($client['documento'])));
            $stmt->bindParam(":zipcode", htmlspecialchars(strip_tags($client['cep'])));
            $stmt->bindParam(":address", htmlspecialchars(strip_tags($client['endereco'])));
            $stmt->bindParam(":district", htmlspecialchars(strip_tags($client['bairro'])));
            $stmt->bindParam(":city", htmlspecialchars(strip_tags($client['cidade'])));
            $stmt->bindParam(":state", htmlspecialchars(strip_tags($client['uf'])));
            $stmt->bindParam(":phone", htmlspecialchars(strip_tags($client['telefone'])));
            $stmt->bindParam(":email", htmlspecialchars(strip_tags($client['email'])));
            $stmt->bindParam(":active", $active);

            if(!$stmt->execute()){
                return false;
            }
        }        

        return true;

    }

    public function delete($data)
    {
        unset($data[0]);

        $db = new DB();
        $conn = $db->connect();

       $query = "DELETE FROM products WHERE sku = ?";

       foreach($data as $sku){

            $stmt = $conn->prepare($query);
            $stmt->execute([$sku]);
    
        }

        // Redirect to the Produc List page
        echo '<script type="text/javascript">
                window.location = "index.php"
                </script>';
    }
}
