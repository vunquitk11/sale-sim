import React, { Component } from 'react';

class Pay extends Component {
    render() {
        return (
            <main id="main">
                <div className="pay">
                    <div className="container">
                        <p className="pay-title">Thông tin thanh toán</p>
                        <div className="pay-box">
                            <p className="pay-name">Trương Văn Nhất</p>
                            <p className="pay-bank">NGÂN HÀNG VIETCOMBANK</p>
                            <p className="pay-number">Số tài khoản: <b>0424.547.22.33.44</b></p>
                            <p className="pay-add">Chi nhánh: <b>Quận 9, Thủ Đức</b></p>
                        </div>
                        <p className="pay-title">Cách mua sim</p>
                    </div>
                </div>
            </main>
        );
    }
}

export default Pay;