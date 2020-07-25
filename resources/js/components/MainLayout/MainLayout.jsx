import React from 'react';
import ListFilter from '../small-component/ListFilter/ListFilter';
import CustomerSupport from '../small-component/CustomerSupport/CustomerSupport';
import News from '../small-component/News/News';
import Bank from '../small-component/Bank/Bank';
import Order from '../small-component/Order/Order';
const listData = [
    "Sim dưới 500K",
    "Sim giá 500K - 1tr",
    "Sim giá 1tr - 3tr",
    "Sim giá 3tr - 5tr",
    "Sim giá 5tr - 10tr",
    "Sim giá 10tr - 20tr",
    "Sim giá 20tr - 30tr",
    "Sim giá 30tr - 50tr",
    "Sim giá 50tr - 100tr",
    "Sim trên 100tr",
]
const listData01 = [
    "Sim lục quý",
    "Sim ngũ quý",
    "Sim tứ quý",
    "Sim tam hoa",
    "Sim taxi",
    "Sim lộc phát",
    "Sim số lặp",
    "Sim số gánh",
    "Sim số tiến",
    "Sim số kép",
    "Sim số đảo",
    "Sim thần tài",
    "Sim ông địa",
    "Sim đầu cổ",
    "Sim trả sau",
    "Sim giá rẻ",
    "Sim trả góp",
    "Sim VIP",
    "Sim năm sinh",
    "Sim phong thủy",
]
export default ({children}) => (
    <main id="main">
        <div className="container">
            <div className="row">
                <div className="main-content col-xl-8">
                    <div className="under-section">
                        <p className="under-title label-sim">Sim đặc biệt</p>
                        <div className="under-content">
                            <ListFilter data={listData01}></ListFilter>
                        </div>
                    </div>
                    {children}
                    <div className="under-section">
                        <p className="under-title label-sim">Tin tức &amp; khuyến mãi</p>
                        <News></News>
                    </div>
                </div>
                <div className="main-right col-xl-4">
                    <div className="under-section">
                        <p className="under-title center">Hỗ trợ khách hàng</p>
                        <CustomerSupport></CustomerSupport>
                    </div>
                    <div className="under-section">
                        <p className="under-title center">Sim theo giá</p>
                        <ListFilter data={listData}></ListFilter>
                    </div>
                    <div className="under-section">
                        <ul className="under-banner">
                            <li><a href="#"><img src={require("../../../../public/frontend/images/idx_banner01.jpg")} /></a></li>
                            <li><a href="#"><img src={require("../../../../public/frontend/images/idx_banner02.png")} /></a></li>
                            <li><a href="#"><img src={require("../../../../public/frontend/images/idx_banner03.png")} /></a></li>
                            <li><a href="#"><img src={require("../../../../public/frontend/images/idx_banner04.png")} /></a></li>
                        </ul>
                    </div>
                    <div className="under-section">
                        <p className="under-title center">Tài khoản ngân hàng</p>
                        <div className="under-block">
                            <Bank></Bank>
                        </div>
                    </div>
                    <div className="under-order">
                    <p className="under-title center">Đơn hàng mới</p>
                        <div className="under-block">
                            <Order></Order>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
);