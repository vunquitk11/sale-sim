import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import ReactPaginate from 'react-paginate';

class Product extends Component {
    constructor(props) {
        super(props);
        this.state = {
            offset: 0,
            perPage: 15,
            currentPage: 0
        };
        this.handlePageClick = this.handlePageClick.bind(this);
    }
    getData() {
        const data = this.props.data;
        const slice = data.slice(this.state.offset, this.state.offset + this.state.perPage)
        const postData = slice.map((post, index) => <React.Fragment>
            <tr>
                <td className="stt">{index + 1 + this.state.currentPage*this.state.perPage}</td> 
                <td className="sim-number"><Link to={"/info/"+post.simNumber} className={post.promotion ? 'promotion' : null}>{post.simNumber}</Link></td>
                <td>{post.price}</td>
                <td className={post.category}></td>
                <td className="product">{post.product}</td>
                <td><button>Mua sim</button></td>
            </tr>
        </React.Fragment>)
        this.setState({
            pageCount: Math.ceil(data.length / this.state.perPage),
            postData
        })
    }
    handlePageClick = (event) => {
        const selectedPage = event.selected;
        const offset = selectedPage * this.state.perPage;
        this.setState({
            currentPage: selectedPage,
            offset: offset
        }, () => {
            this.getData()
        });
    };
    componentDidMount() {
        this.getData();
    }
    render() {
        return (
            <>
                <div className="under-section">
                    <div className="product-tbl">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Số sim</th>
                                    <th>Giá tiền</th>
                                    <th>Nhà mạng</th>
                                    <th>Loại sim</th>
                                    <th>Giỏ hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.state.postData}
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div className="under-section">
                    <ReactPaginate
                        previousLabel={"<<"}
                        nextLabel={">>"}
                        breakLabel={"..."}
                        breakClassName={"break-me"}
                        pageCount={this.state.pageCount}
                        marginPagesDisplayed={3}
                        pageRangeDisplayed={2}
                        onPageChange={this.handlePageClick.bind(this)}
                        containerClassName={"under-pagination"}
                        activeClassName={"active"}
                    />
                </div>
            </>
        );
    }
}

export default Product;