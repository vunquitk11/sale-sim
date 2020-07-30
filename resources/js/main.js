
//load data function
async function loadDataHaveID(url,page,id) {
  let response = await fetch(`/get/${url}/${id}?page=${page}`);
  let data = await response.json()
  return data;
}
async function loadData(url,page) {
  let response = await fetch(`/get/${url}?page=${page}`);
  let data = await response.json()
  return data;
}
async function loadData1(url,page,para_name,para_value) {
  let response = await fetch(`/get/${url}?${para_name}=${para_value}&page=${page}`);
  let data = await response.json()
  return data;
}
async function loadData2(url,page,para1_name,para1_value,para2_name,para2_value) {
  let response = await fetch(`/get/${url}?${para1_name}=${para1_value}&${para2_name}=${para2_value}&page=${page}`);
  let data = await response.json()
  return data;
}

async function postData(url,dataForm){
  var token = $('meta[name="csrf-token"]').attr('content');
  const settings = {
      method: 'POST',
      headers: {
          "X-CSRF-TOKEN": token
      },
      body: dataForm
  };
  try {
      const fetchResponse = await fetch(`/post/${url}`, settings);
      const data = await fetchResponse.json();
      return data;
  } catch (e) {
      return e;
  }
}

async function postDataHaveID(url,dataForm,id){
  var token = $('meta[name="csrf-token"]').attr('content');
  const settings = {
      method: 'POST',
      headers: {
          "X-CSRF-TOKEN": token
      },
      body: dataForm
  };
  try {
      const fetchResponse = await fetch(`/post/${url}/${id}`, settings);
      const data = await fetchResponse.json();
      return data;
  } catch (e) {
      return e;
  }
}
