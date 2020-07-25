import React, { Component } from 'react';
import { Link } from 'react-router-dom'

class Navigation extends Component {
    render() {
        return (
            <nav id="gnavi">
                <div className="container">
                    <ul>
                        <li><Link to="/">Trang Chủ</Link></li>
                        <li><Link to="/sale">Sim khuyến mãi</Link></li>
                        <li><Link to="/vip">Sim số đẹp</Link></li>
                        <li><Link to="/pay">Thanh toán</Link></li>
                        <li><Link to="/contact">Liên hệ</Link></li>
                    </ul>
                </div>
            </nav>
        );
    }
}

export default Navigation;