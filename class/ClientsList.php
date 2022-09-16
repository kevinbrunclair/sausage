<?php


class ClientsList
{
    private array $clients;

    function __construct()
    {
        $db = databaseConnect();
        $clients = selectallcustomers($db);
        $this->setClients($clients);
    }

    public function getClients(): array
    {
        return $this->clients;
    }

    public function setClients(array $clients): void
    {
        foreach ($clients as $client) {
            $this->clients[] = new Client($client);
        }
    }


}



