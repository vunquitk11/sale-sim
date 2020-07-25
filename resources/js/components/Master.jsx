
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

const Master = () => {
    return(
        <Router>
            <div className="wrapper">
            <Header/>
                <Switch>
                    
                        <AppRouter exact path="/" component={Home} layout={MainLayout}></AppRouter>
                            {/* <Route exact path="/results" component={SearchResult}></Route>
                            <Route exact path="/fitness" component={Video}></Route> */}
                </Switch>
            <Footer/>
            </div>
        </Router>
    )
}

export default Master;

if (document.getElementById('master')) {
    ReactDOM.render(<Master/>, document.getElementById('master')); 
}
