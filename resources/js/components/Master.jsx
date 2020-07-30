
import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import ReactDOM from 'react-dom';

//css
import 'bootstrap/dist/css/bootstrap-grid.min.css';

//import app router
import AppRouter from './AppRouter';

//import view
import MainLayout from './MainLayout/MainLayout';
import Footer from './small-component/Footer/Footer';
import Header from './small-component/Header/Header';

import Home from './Home/Home';

//context
export const MainContext = React.createContext()

const Master = () => {
    //api context
    const _loadDataHaveID = async (url,page,id) => {
        let response = await fetch(`/api/get/${url}/${id}?page=${page}`);
        let data = await response.json()
        return data;
    }
    const _loadData = async (url,page) => {
        let response = await fetch(`/api/get/${url}?page=${page}`);
        let data = await response.json()
        return data;
    }
    const _loadData1 = async (url,page,para_name,para_value) => {
        let response = await fetch(`/api/get/${url}?${para_name}=${para_value}&page=${page}`);
        let data = await response.json()
        return data;
    }
    const _loadData2 = async (url,page,para1_name,para1_value,para2_name,para2_value) => {
        let response = await fetch(`/api/get/${url}?${para1_name}=${para1_value}&${para2_name}=${para2_value}&page=${page}`);
        let data = await response.json()
        return data;
    }
    const _postData = async (url,dataForm) => {
        var token = $('meta[name="csrf-token"]').attr('content');
        const settings = {
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": token
            },
            body: dataForm
        };
        try {
            const fetchResponse = await fetch(`/api/post/${url}`, settings);
            const data = await fetchResponse.json();
            return data;
        } catch (e) {
            return e;
        }
    }
    const _postDataHaveID = async (url,dataForm,id) => {
        var token = $('meta[name="csrf-token"]').attr('content');
        const settings = {
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": token
            },
            body: dataForm
        };
        try {
            const fetchResponse = await fetch(`/api/post/${url}/${id}`, settings);
            const data = await fetchResponse.json();
            return data;
        } catch (e) {
            return e;
        }
    }
    //end
    
    return(
        <Router>
            <div className="wrapper">
            <MainContext.Provider
            key = {1}
            value={{
                loadData: (url,page) => _loadData(url,page),
              }}
            >
                <Header/>
                    <Switch>
                        <AppRouter exact path="/" component={Home} layout={MainLayout}></AppRouter>
                    </Switch>
                <Footer/>
            </MainContext.Provider>
            </div>
        </Router>
    )
}

export default Master;

if (document.getElementById('master')) {
    ReactDOM.render(<Master/>, document.getElementById('master')); 
}
