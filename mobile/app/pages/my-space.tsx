import { Text, View, TouchableOpacity, StyleSheet } from 'react-native';
import { useRouter } from 'expo-router';
import NavBar from '../nav-bar';
import TopBar from '../top-bar';

export default function MySpace() {
  const router = useRouter();

  return (
    <View style={styles.container}>
      <TopBar />
      <View style={styles.content}>
        <Text style={styles.title}>Mon Espace</Text>
        
        <TouchableOpacity 
          style={styles.button}
          onPress={() => router.push('./color')}
        >
          <Text style={styles.buttonText}>Voir les couleurs</Text>
        </TouchableOpacity>

        <TouchableOpacity 
          style={[styles.button, { marginTop: 50 }]}
          onPress={() => router.push('/connexion')}
        >
          <Text style={styles.buttonText}>Connexion</Text>
        </TouchableOpacity>

      </View>
      
      <NavBar />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 28,
    fontWeight: 'bold',
    marginBottom: 30,
    color: '#362E7D',
  },
  button: {
    backgroundColor: '#647EE8',
    paddingVertical: 15,
    paddingHorizontal: 40,
    borderRadius: 10,
  },
  buttonText: {
    color: '#fff',
    fontSize: 18,
    fontWeight: '600',
  },
});
