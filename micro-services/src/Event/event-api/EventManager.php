<?php


namespace App\Event;

use PDO;

include_once('Manager.php');

class EventManager extends Manager
{


    public function add(Event $event)
    {
        $_db = $this->connect();

        $q = $_db->prepare('INSERT INTO evenements(email, date, label, repeatday) VALUES(?, ?, ?, ?)');
        $result = $q->execute(array($event->getEmail(), $event->getDate(), $event->getLabel(), $event->getRepeat()));

        return (bool)$result;

    }

    public function update(Event $event)
    {
        $_db = $this->connect();
        $q = $_db->prepare('UPDATE evenements SET date = ? , label = ?, repeatday = ? WHERE email = ?');
        $q->execute(array($event->getDate(), $event->getLabel(), $event->getRepeat(), $event->getEmail()));

    }

    public function delete($email)
    {
        $_db = $this->connect();
        $q = $_db->prepare('DELETE FROM evenements WHERE email = ?');
        $q->execute(array($email));

    }

    public function get($email)
    {
        $_db = $this->connect();
        $q = $_db->prepare('SELECT email, date, label, repeat FROM evenements WHERE email = ?');
        $q->execute(array($email));

        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public function exist($email)
    {
        $_db = $this->connect();
        $q = $_db->prepare('SELECT COUNT(*) FROM evenements WHERE email=?');
        $q->execute(array($email));

        return (bool)$q->fetchColumn();
    }


}