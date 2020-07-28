import React, { Component } from 'react';
import Navigation from '../Navigation/Navigation';

class Header extends Component {
    render() {
        return (
            <header id="header">
                <div className="header-top">
                    <div className="container">
                        <div className="header-content">
                            <p className="header-logo"><a href="/"><img src='/images/header_logo.png' /></a></p>
                            <p className="header-banner"><img src={require('../../../../images/idx_banner_top.png')} /></p>
                        </div>
                    </div>
                </div>
                <Navigation></Navigation>
            </header>
        );
    }
}

export default Header;