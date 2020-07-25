import React, { Component } from 'react';
import { Link } from 'react-router-dom'

class Gnavi extends Component {
    render() {
        return (
            <nav id="gnavi">
                <div className="container">
                    <ul>
                        <li><Link to="/">Trang aChủ</Link></li>
                        <li><Link to="/new">Sim mới</Link></li>
                        <li><Link to="/vip">Sim số đẹp</Link></li>
                        <li><Link to="/buy">Thanh toán</Link></li>
                        <li><Link to="/contact">Liên hệ</Link></li>
                    </ul>
                </div>
            </nav>
        );
    }
}

export default Gnavi;