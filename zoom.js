const errorModal = document.getElementById('error-modal');
const leaveModal = document.getElementById('leave-modal');
function setError(msg) {
	errorModal.style.display = 'block';
	errorModal.innerHTML = msg;
}
function clearError() {
	errorModal.style.display = 'none';
	errorModal.innerHTML = '';
}
function checkLeave() {
	var querys = new URLSearchParams(window.location.search);
	if (querys.get('leave') == 'true') {
		leaveModal.style.display = 'block';
	}
}

const enterSectionZoom = new bootstrap.Modal(document.getElementById('enterSectionZoom'), {
	keyboard: false
});

window.addEventListener('DOMContentLoaded', function (event) {
	console.log('DOM carregado!');
	websdkready();
	enterSectionZoom.show();
	clearError();
	leaveModal.style.display = 'none';
	checkLeave();
});

function websdkready() {
	ZoomMtg.preLoadWasm();
	ZoomMtg.prepareJssdk();

	//Definindo Linguagem
	ZoomMtg.i18n.load('pt-PT');
	ZoomMtg.i18n.reload('pt-PT');

	// evento de click no botão
	const joinMeeting = document.getElementById('join_meeting')

	joinMeeting.addEventListener('click', function (e) {
		e.preventDefault();
		clearError();
		const meetConfig = {
			apiKey: 'pd6UVm_wRaqyKO4jujVMmA', // Olhe o get-zoom-signature.php para mais informações
			signatureEndpoint: 'get-zoom-signature.php',
			meetingNumber: document.getElementById('meetingNumber').value.replace(/ /g, ''),
			leaveUrl: 'http://localhost/?leave=true', // URL para onde o usuário será redirecionado quando clicar no botão de sair
			userName: document.getElementById('userName').value,
			userEmail: document.getElementById('userEmail').value,
			passWord: document.getElementById('meetingPassword').value,
			role: document.getElementById('meetingRole').value // 1 é transmissor; 0 é participante
		};
		//console.log({meetConfig});
		
		if (!meetConfig.userName) {
			setError('Usuário está vazio, por favor preencha-o.');
			return false;
		}
		if (!meetConfig.meetingNumber) {
			setError('ID da reunião está vazio, por favor preencha-o.');
			return false;
		}

		fetch(meetConfig.signatureEndpoint, {
				method: 'POST',
				body: JSON.stringify({
					meetingData: meetConfig
				})
			})
			.then(result => result.text())
			.then(response => {
				enterSectionZoom.hide();
				ZoomMtg.init({
					leaveUrl: meetConfig.leaveUrl,
					isSupportAV: true,
					success: function (res) {
						ZoomMtg.join({
							signature: response,
							meetingNumber: meetConfig.meetingNumber,
							userName: meetConfig.userName,
							apiKey: meetConfig.apiKey,
							//userEmail: 'user@gmail.com',
							passWord: meetConfig.passWord,
							success: function (res) {
								console.log('Sucesso ao entrar');
								document.getElementById('nav-tool').style.display = 'none';
								//var joinUrl = 'meeting.html?' + testTool.serialize(meetConfig);
								//window.open(joinUrl, '_blank');
							},
							error: function (res) {
								console.log(res);
							}
						})
					}
				})
			})
	});
}