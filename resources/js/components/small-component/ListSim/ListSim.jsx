import React, { Component } from 'react';
import Data from '../../views/Json/Data.json';
import Product from '../Product/Product';
class ListSim extends Component {
    render() {
        return (
            <>
                <Product data={Data}></Product>
            </>
        );
    }
}

export default ListSim;