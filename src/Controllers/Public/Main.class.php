<?php

class Main{


         public function index()
        {
            # code...


                $GLOBALS["tpl"]->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
                $GLOBALS["tpl"]->template ="index.tpl";
                $GLOBALS["tpl"]->assign("FirstName", array("John", "Mary", "James", "Henry"));
                $GLOBALS["tpl"]->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));
                $GLOBALS["tpl"]->assign("Class", array(array("A", "B", "C", "D"), array("E", "F", "G", "H"), array("I", "J", "K", "L"),
                                            array("M", "N", "O", "P")));

                $GLOBALS["tpl"]->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
                    array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));

 
        }

}