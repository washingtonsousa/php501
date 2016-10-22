            <!-- FIM - CORPO DO SITE -->

            <!-- INÍCIO - RODAPÉ DO SITE -->
			<footer id="rodape">
				<div class="conteudo_padrao">
					<!-- INÍCIO - REDES SOCIAIS -->
					<a class="rede_social rede_social_fb" href="https://www.facebook.com/dextercourier4linux" target="_blank" title="Facebook">Facebook</a>
					<a class="rede_social rede_social_tw" href="https://twitter.com/dextercourier" target="_blank" title="Twitter">Twitter</a>
					<a class="rede_social rede_social_gp" href="https://plus.google.com/" target="_blank" title="Google Plus">Google Plus</a>
					<!-- FIM - REDES SOCIAIS -->

                    <p>&copy; <?= date('Y') ?> Dexter Courier Logistica S/A.</p>
				</div>
			</footer>
			<!-- FIM - RODAPÉ DO SITE -->
		</main>
        <script src="assets/plugins/bxslider/jquery.bxslider.js"></script>
        <script src="<?= $js ?>"></script>
        <script>
            $(document).ready(function(){
                $('#destaque_home ul').bxSlider({
                    pager: false
                });
            });
        </script>
	</body>
</html>
