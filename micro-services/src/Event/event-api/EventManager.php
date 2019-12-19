<?php


namespace App\Event;

use PDO;

include_once(__DIR__ . '/Manager.php');

class EventManager extends Manager
{


    public function add(Event $event)
    {
        $_db = $this->connect();

        $q = $_db->prepare('INSERT INTO evenements(email, date, label, repeatday) VALUES(?, ?, ?, ?)');
        $affectedLines = $q->execute(array($event->getEmail(), $event->getDate(), $event->getLabel(), $event->getRepeat()));

        $event->hydrate([
            'id' => $_db->lastInsertId(),
        ]);

        return (bool)$affectedLines;

    }

    public function update(Event $event)
    {
        $_db = $this->connect();
        $q = $_db->prepare('UPDATE evenements SET date = ? , label = ?, repeatday = ? WHERE id = ?');
        $affectedLines = $q->execute(array($event->getDate(), $event->getLabel(), $event->getRepeat(), $event->getId()));

        return (bool)$affectedLines;
    }

    public function delete($id)
    {
        $_db = $this->connect();
        $q = $_db->prepare('DELETE FROM evenements WHERE id = ?');
        $q->execute(array($id));

    }

    public function get($email)
    {
        //récupération des événements liée a un email
        $_db = $this->connect();
        $q = $_db->prepare('SELECT id, email, date, label, repeatday FROM evenements WHERE email= ? ORDER BY date ASC');
        $q->execute(array($email));

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $events[] = $donnees;
        }

        return $events;
    }

    public function exist($info)
    {
        $_db = $this->connect();

        //si on envoi un email
        if (is_string($info)) {
            $q = $_db->prepare('SELECT COUNT(*) FROM evenements WHERE email=?');
            $q->execute(array($info));

            return (bool)$q->fetchColumn();
        } //si on envoi un id
        elseif (is_int($info)) {
            $q = $_db->prepare('SELECT COUNT(*) FROM evenements WHERE id=?');
            $q->execute(array($info));

            return (bool)$q->fetchColumn();
        }


    }


}