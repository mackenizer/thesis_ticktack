<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Comment</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="<?=base_url()?>/evaluate/<?= $uri->getSegment(2) ?>" method="post">
									<div class="mb-3">
										<input type="text" class="form-control" id="recipient-name" name="id" hidden>
									</div>
									<div class="mb-3">
										<label for="message-text" class="col-form-label">Comment:</label>
										<textarea class="form-control" id="message-text" name="evaluate"></textarea>
										
										<label for="" class="mt-2">Grade</label>
										<select class="form-select" name="rate" aria-label="Default select example">
											<option selected>1.0</option>
											<option value="1">1.25</option>
											<option value="2">1.50</option>
											<option value="3">1.75</option>
											<option value="4">2.0</option>
											<option value="5">2.25</option>
											<option value="6">2.50</option>
											<option value="7">2.75</option>
											<option value="8">3.0</option>
											<option value="9">5.0</option>
											</select>           
										</select>
									</div>
									<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Rate</button>
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									
									</form>
								</div>
							
							
								
								</div>
							</div>
							</div>










