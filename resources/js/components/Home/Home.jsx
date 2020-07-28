import React, {useState,useEffect} from 'react';
import Data from '../Json/Data.json';
import IdxProduct from '../small-component/IdxProduct/IdxProduct'

const Home = () => {
    return (
        <div>
            <div className="under-section">
                <p className="under-title label-sim">Tất cả sim</p>
                <IdxProduct data={Data}></IdxProduct>
                <p className="under-button"><a href="/sim/">Xem thêm</a></p>
            </div>
            <div className="under-section">
                <p className="under-title label-sim">Sim giá rẻ</p>
                <IdxProduct data={Data}></IdxProduct>
                <p className="under-button"><a href="/sim/sim-gia-re">Xem thêm</a></p>
            </div>
            <div className="under-section">
                <p className="under-title label-sim">Sim thần tài</p>
                <IdxProduct data={Data}></IdxProduct>
                <p className="under-button"><a href="/sim/sim-than-tai">Xem thêm</a></p>
            </div>
            <div className="under-section">
                <p className="under-title label-sim">Sim tứ quý</p>
                <IdxProduct data={Data}></IdxProduct>
                <p className="under-button"><a href="/sim/sim-tu-quy">Xem thêm</a></p>
            </div>
        </div>
    );
}

export default Home;