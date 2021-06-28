import { useEffect, useState } from "react";
import axios from 'axios';

export const Actions = () => {
  let [users, setUsers] = useState([]);
  let [userLength, setUserLength] = useState(null);

  useEffect(() => {
    fetch("http://localhost/validadorCep/src/api/cidade/read.php")
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        if (data) {
          setUsers(data.records.reverse());
          setUserLength(true);
        } else {
          setUserLength(0);
        }
      })
      .catch((err) => {
        console.log(err);
      });
  }, []);

  const insertUser = (newUser) => {
      
    axios.defaults.baseURL = 'http://localhost/validadorCep/src/api/cidade/create.php';
    axios.defaults.headers.post['Content-Type'] ='application/json;charset=utf-8';
    axios.defaults.headers.post['Access-Control-Allow-Origin'] = '*';
    axios.post('http://localhost/validadorCep/src/api/cidade/create.php')
    .then(resp => {
    console.log("Funcionou");
    })
    .catch(error => {
    console.log(error);
    })

/*
    fetch("http://localhost/validadorCep/src/api/cidade/create.php", {
      method: "POST",
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "POST, GET",
        "Access-Control-Allow-Headers": "*",
        "Access-Control-Max-Age": "86400",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(newUser),
    })
      .then((res) => {
        console.log(res);
        return res.json();
      })
      .then((data) => {
        if (data.id) {
          setUsers([
            {
              id: data.id,
              ...newUser,
            },
            ...users,
          ]);
          setUserLength(true);
        } else {
          alert(data.msg);
        }
      })
      .catch((err) => {
        console.log(err);
      });*/
  };

  return {
    users,
    insertUser,
    userLength,
  };
};