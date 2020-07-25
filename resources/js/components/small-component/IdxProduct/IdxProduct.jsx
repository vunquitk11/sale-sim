import React, { Component } from 'react';

class IdxProduct extends Component {
    render() {
        const renderItem = this.props.data.map((Item, index) => {
            return index < 20 ? <li key={Item}><a href={"/info/" + Item.simNumber} className={Item.category}>{Item.simNumber}<span>{Item.price}&nbsp;₫</span></a></li> : null
        });
        return (
            <ul className="under-product">
                {renderItem}
            </ul>
        );
    }
}

export default IdxProduct;