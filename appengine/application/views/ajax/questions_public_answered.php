<?php
if(count($questions) == 0)
	echo '
	<div style="margin-top: 5px;">
		<paper-card style="display: flex; flex-direction: column; border-left: 1px solid rgba(0, 0, 0, 0);  padding: 5px 5px 25px 5px; box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0.04);">
			<div style="display: flex; width: 100%">
				<div class="spce">
				</div>
				<div class="flex-6" style="padding: 0px 20px 0px 20px;">
					<div id="questions" style="height: 100%; margin-top: 25px; display: flex; flex-direction: column; position: relative;">
						<div class="ans" style="margin-top: 5px;">
							<p style="opacity: 0.8; font-size: 14px;">'.$message.'</p>
						</div>
					</div>
				</div>
				<div class="flex">
				</div>
			</div>
		</paper-card>
	</div>';
foreach ($questions as $row)
{

	echo '
	<div style="margin-top: 5px;">
		<paper-card style="display: flex; flex-direction: column; border-left: 1px solid rgba(0, 0, 0, 0);  padding: 5px 5px 25px 5px; box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0.04);">
			<div style="display: flex; width: 100%">
				<div class="spce">
				</div>
				<div class="flex-6" style="padding: 0px 20px 0px 20px;">
					<div id="questions" style="height: 100%; margin-top: 25px; display: flex; flex-direction: column; position: relative;">
						<div class="quest">
							<p style="font-weight: bold; font-size: 14px;">'.$row->question.'</p>
						</div>
						<div class="ans" style="margin-top: 5px;">
							<p style="opacity: 0.8; font-size: 14px;">'.$row->answer.'</p>
						</div>
					</div>
				</div>
				<div class="flex">
				</div>
			</div>
		</paper-card>
	</div>';
}
?>
