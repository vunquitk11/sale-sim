import React, { Component } from 'react';

class Order extends Component {
    render() {
        return (
            <ul className="under-order">
                <li>
                    <p>Khách: <span className="bold">Lê Duy Tân</span></p>
                    <p>Đặt sim: <span className="bold">096821xxxx</span></p>
                    <p>Lúc: <span className="bold">21/08/2020 22:37:40</span></p>
                    <p className="order-status ordered">Đã đặt hàng</p>
                </li>
                <li>
                    <p>Khách: <span className="bold">Nguyễn Tất Dương</span></p>
                    <p>Đặt sim: <span className="bold">096821xxxx</span></p>
                    <p>Lúc: <span className="bold">25/07/2020 22:37:40</span></p>
                    <p className="order-status ordered">Đã đặt hàng</p>
                </li>
                
                <li>
                    <p>Khách: <span className="bold">Nguyễn Chu Trình</span></p>
                    <p>Đặt sim: <span className="bold">096821xxxx</span></p>
                    <p>Lúc: <span className="bold">21/04/2020 22:37:40</span></p>
                    <p className="order-status confirmed">Đang xác nhận</p>
                </li>
                
                <li>
                    <p>Khách: <span className="bold">Phan Bá Duy</span></p>
                    <p>Đặt sim: <span className="bold">096821xxxx</span></p>
                    <p>Lúc: <span className="bold">21/07/2020 22:37:40</span></p>
                    <p className="order-status confirmed">Đang xác nhận</p>
                </li>
            </ul>
        );
    }
}

export default Order;