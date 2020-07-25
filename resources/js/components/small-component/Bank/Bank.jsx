import React, { Component } from 'react';

class Bank extends Component {
    render() {
        return (
            <ul className="under-bank">
                <li>
                    <p className="bank-title">NGÂN HÀNG TECHCOMBANK</p>
                    <p><a href="http://www.techcombank.com.vn/" target="blank">www.techcombank.com.vn</a></p>
                    <p>Chủ tài khoản: Trương Văn Nhất</p>
                    <p>Số tài khoản: 123456789</p>
                </li>
                <li>
                    <p className="bank-title">NGÂN HÀNG VIETCOMBANK</p>
                    <p><a href="https://www.vietcombank.com.vn/" target="blank">www.vietcombank.com.vn</a></p>
                    <p>Chủ tài khoản: Nguyễn Xuân Bình</p>
                    <p>Số tài khoản: 123456789</p>
                </li>
                <li>
                    <p className="bank-title">NGÂN HÀNG AGRIBANK</p>
                    <p><a href="https://www.agribank.com.vn/" target="blank">www.agribank.com.vn</a></p>
                    <p>Chủ tài khoản: Nguyễn Vũ</p>
                    <p>Số tài khoản: 123456789</p>
                </li>
            </ul>
        );
    }
}

export default Bank;